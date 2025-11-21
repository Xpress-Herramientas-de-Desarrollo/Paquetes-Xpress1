# GitHub Actions CI/CD Workflows

Este directorio contiene los workflows de CI/CD para automatizar las tareas de desarrollo, testing y deployment del proyecto.

## 📋 Workflows Disponibles

### 1. `ci.yml` - Pipeline Completo de CI/CD

**Cuándo se ejecuta:**
- Push a las ramas `main` o `develop`
- Pull Requests a las ramas `main` o `develop`

**Jobs incluidos:**

1. **Validación** (`validate`)
   - Valida `composer.json` y `composer.lock`
   - Verifica sintaxis PHP en todos los archivos
   - Instala dependencias

2. **Calidad de Código** (`code-quality`)
   - Ejecuta PHP CS Fixer (dry-run)
   - Verifica estándares de CodeIgniter Coding Standard

3. **Tests** (`test`)
   - Ejecuta tests con PHPUnit en múltiples versiones de PHP (8.1, 8.2, 8.3)
   - Configura base de datos MySQL para tests
   - Genera reportes de cobertura de código
   - Sube artefactos de coverage

4. **Seguridad** (`security`)
   - Ejecuta auditoría de dependencias con `composer audit`
   - Detecta vulnerabilidades conocidas

5. **Build** (`build`)
   - Crea build de producción (sin dependencias dev)
   - Optimiza autoloader
   - Verifica estructura del proyecto

6. **Notificación** (`notify`)
   - Genera resumen de todos los jobs
   - Muestra resultados en GitHub Actions

### 2. `deploy.yml` - Deployment Automático

**Cuándo se ejecuta:**
- Push a la rama `main`
- Manualmente desde GitHub Actions (workflow_dispatch)

**Características:**
- Prepara artefactos para deployment
- Optimiza para producción
- Ejecuta migraciones (opcional)
- Crea paquete comprimido listo para desplegar

**Configuración necesaria:**
Para usar deployment automático, configura los siguientes secrets en GitHub:
- `HOST`: Dirección del servidor
- `USERNAME`: Usuario SSH
- `SSH_KEY`: Clave privada SSH

### 3. `quick-check.yml` - Validación Rápida

**Cuándo se ejecuta:**
- Pull Requests
- Push a ramas principales

**Características:**
- Validación rápida de sintaxis
- Tests básicos
- Ideal para feedback rápido en PRs

## 🚀 Configuración Inicial

### 1. Configurar Base de Datos para Tests

Edita el archivo `.env` o `phpunit.xml.dist` para configurar la base de datos de pruebas:

```php
// En phpunit.xml.dist, descomenta y configura:
<env name="database.tests.hostname" value="127.0.0.1"/>
<env name="database.tests.database" value="bd_xpress_test"/>
<env name="database.tests.username" value="root"/>
<env name="database.tests.password" value="root"/>
<env name="database.tests.DBDriver" value="MySQLi"/>
```

### 2. Configurar Secrets para Deployment (Opcional)

1. Ve a tu repositorio en GitHub
2. Settings → Secrets and variables → Actions
3. Agrega los secrets necesarios:
   - `HOST`
   - `USERNAME`
   - `SSH_KEY`

### 3. Habilitar Codecov (Opcional)

Si quieres usar Codecov para reportes de coverage:

1. Regístrate en [codecov.io](https://codecov.io)
2. Conecta tu repositorio
3. Obtén el token de Codecov
4. Agrega el secret `CODECOV_TOKEN` en GitHub

## 📊 Ver Resultados

- Ve a la pestaña **Actions** en tu repositorio de GitHub
- Selecciona el workflow que quieres ver
- Revisa los logs de cada job
- Descarga artefactos (coverage reports, test results, etc.)

## 🔧 Personalización

### Agregar más versiones de PHP

Edita `ci.yml` y modifica la matriz en el job `test`:

```yaml
matrix:
  php-version:
    - '8.1'
    - '8.2'
    - '8.3'
    - '8.4'  # Agregar nueva versión
```

### Cambiar ramas monitoreadas

Modifica el trigger `on:` en cada workflow:

```yaml
on:
  push:
    branches: [ "main", "develop", "feature/*" ]
```

### Agregar notificaciones

Puedes agregar notificaciones a Slack, Discord, Email, etc. usando acciones como:
- `slackapi/slack-github-action`
- `8398a7/action-slack`

## 📝 Notas

- Los workflows usan cache de Composer para acelerar las ejecuciones
- Los tests se ejecutan en paralelo para diferentes versiones de PHP
- El coverage se genera solo para PHP 8.1 para optimizar tiempo
- Los artefactos se mantienen por 7-30 días según su tipo

## 🐛 Solución de Problemas

### Tests fallan por base de datos

Asegúrate de que:
1. El servicio MySQL esté configurado correctamente en el workflow
2. Las credenciales en `.env` o `phpunit.xml.dist` sean correctas
3. Las migraciones se ejecuten antes de los tests

### Coverage no se genera

Verifica que:
1. Xdebug esté instalado y configurado
2. El flag `xdebug.mode=coverage` esté habilitado
3. Solo se genera coverage para PHP 8.1 (configuración actual)

### Deployment falla

Revisa:
1. Que los secrets estén configurados correctamente
2. Que la clave SSH tenga permisos adecuados
3. Que el servidor tenga espacio y permisos necesarios

