# 🚀 Guía de CI/CD para Paquetes XPRESS

## 📦 ¿Qué se ha configurado?

Se ha creado un sistema completo de CI/CD (Integración Continua / Despliegue Continuo) para tu proyecto CodeIgniter 4 usando GitHub Actions.

## 🎯 Workflows Creados

### 1. **CI Pipeline Completo** (`.github/workflows/ci.yml`)

Este es el workflow principal que se ejecuta en cada push y pull request. Incluye:

✅ **Validación de Composer**
- Verifica que `composer.json` y `composer.lock` sean válidos
- Instala dependencias
- Verifica sintaxis PHP en todos los archivos

✅ **Análisis de Calidad de Código**
- PHP CS Fixer (verificación de formato)
- CodeIgniter Coding Standard

✅ **Tests Automatizados**
- Ejecuta PHPUnit en múltiples versiones de PHP (8.1, 8.2, 8.3)
- Configura MySQL automáticamente para tests
- Genera reportes de cobertura de código
- Sube artefactos con resultados

✅ **Auditoría de Seguridad**
- Revisa vulnerabilidades en dependencias con `composer audit`

✅ **Build de Producción**
- Crea build optimizado sin dependencias de desarrollo
- Verifica estructura del proyecto

### 2. **Deployment Automático** (`.github/workflows/deploy.yml`)

Workflow para desplegar automáticamente cuando se hace push a `main`:

- Prepara artefactos optimizados
- Ejecuta migraciones (opcional)
- Crea paquete listo para producción
- Listo para configurar deployment a servidor

### 3. **Validación Rápida** (`.github/workflows/quick-check.yml`)

Workflow ligero para feedback rápido en Pull Requests:

- Validación rápida de sintaxis
- Tests básicos
- Ejecución más rápida

## 🛠️ Configuración Necesaria

### Paso 1: Configurar Base de Datos para Tests

El workflow ya está configurado para usar MySQL en los tests, pero puedes personalizarlo editando `.github/workflows/ci.yml` si necesitas diferentes credenciales.

### Paso 2: (Opcional) Configurar Deployment

Si quieres deployment automático a un servidor:

1. Ve a tu repositorio en GitHub → **Settings** → **Secrets and variables** → **Actions**
2. Agrega estos secrets:
   - `HOST`: IP o dominio de tu servidor
   - `USERNAME`: Usuario SSH
   - `SSH_KEY`: Tu clave privada SSH

3. Descomenta las secciones de deployment en `.github/workflows/deploy.yml`

### Paso 3: (Opcional) Habilitar Codecov

Para reportes de cobertura más detallados:

1. Regístrate en [codecov.io](https://codecov.io)
2. Conecta tu repositorio
3. Agrega el secret `CODECOV_TOKEN` en GitHub

## 📊 Cómo Usar

### Ver los Resultados

1. Ve a la pestaña **Actions** en tu repositorio de GitHub
2. Verás todos los workflows ejecutados
3. Haz clic en uno para ver detalles
4. Descarga artefactos (coverage, test results) desde la página del workflow

### Ejecutar Manualmente

1. Ve a **Actions** → Selecciona el workflow
2. Haz clic en **Run workflow**
3. Selecciona la rama y ejecuta

### En Pull Requests

Los workflows se ejecutan automáticamente y verás:
- ✅ o ❌ en el PR indicando si pasó
- Comentarios con resultados de tests
- Reportes de coverage

## 🎨 Personalización

### Cambiar Versiones de PHP

Edita `.github/workflows/ci.yml`:

```yaml
matrix:
  php-version:
    - '8.1'
    - '8.2'
    - '8.3'
    # Agrega más versiones aquí
```

### Cambiar Ramas Monitoreadas

Edita el trigger en cada workflow:

```yaml
on:
  push:
    branches: [ "main", "develop", "tu-rama" ]
```

### Agregar Notificaciones

Puedes agregar notificaciones a Slack, Discord, etc. usando acciones disponibles en el GitHub Marketplace.

## 📈 Beneficios

1. **Detección Temprana de Errores**: Los problemas se detectan antes de llegar a producción
2. **Calidad de Código**: Se asegura que el código siga estándares
3. **Tests Automatizados**: Se ejecutan en cada cambio
4. **Seguridad**: Se revisan vulnerabilidades automáticamente
5. **Deployment Automático**: Despliegue sin intervención manual
6. **Historial**: Todos los builds y tests quedan registrados

## 🔍 Qué Revisa el CI

- ✅ Sintaxis PHP correcta
- ✅ Dependencias válidas y seguras
- ✅ Tests pasando
- ✅ Código siguiendo estándares
- ✅ Estructura del proyecto correcta
- ✅ Build de producción funcional

## 🐛 Solución de Problemas

### Los tests fallan

- Verifica que las migraciones estén correctas
- Revisa la configuración de la base de datos en el workflow
- Asegúrate de que los tests estén bien escritos

### Coverage no se genera

- Solo se genera para PHP 8.1 (para optimizar tiempo)
- Verifica que Xdebug esté configurado en el workflow

### El workflow no se ejecuta

- Verifica que estés haciendo push a las ramas correctas (`main` o `develop`)
- Revisa que el archivo esté en `.github/workflows/`
- Verifica los permisos del repositorio

## 📚 Recursos Adicionales

- [Documentación de GitHub Actions](https://docs.github.com/en/actions)
- [CodeIgniter 4 Testing Guide](https://codeigniter.com/user_guide/testing/index.html)
- [PHPUnit Documentation](https://phpunit.de/documentation.html)

## ✨ Próximos Pasos

1. **Haz un commit y push** de estos archivos
2. **Ve a la pestaña Actions** en GitHub para ver el primer workflow ejecutándose
3. **Revisa los resultados** y ajusta según necesites
4. **Configura deployment** si lo necesitas
5. **Agrega más tests** para aumentar la cobertura

---

¿Necesitas ayuda? Revisa los logs en GitHub Actions o consulta la documentación en `.github/workflows/README.md`

