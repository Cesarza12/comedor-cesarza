p#!/data/data/com.termux/files/usr/bin/bash
# Script Termux: actualizar proyecto, hacer commit con mensaje personalizado y levantar servidor PHP

# 1️⃣ Ir a la carpeta del proyecto
cd ~/proyecto/comedor-cesarza || { echo "Carpeta no encontrada"; exit 1; }

# 2️⃣ Verificar cambios
git status

# 3️⃣ Preguntar mensaje de commit
read -p "Escribe el mensaje del commit: " COMMIT_MSG

# 4️⃣ Agregar archivos modificados
git add .

# 5️⃣ Crear commit solo si hay cambios
if git diff-index --quiet HEAD --; then
    echo "No hay cambios para commitear."
else
    git commit -m "$COMMIT_MSG"
    git push origin main
fi

# 6️⃣ Arrancar servidor PHP
echo "Servidor PHP arrancando en http://0.0.0.0:8080 ..."
php -S 0.0.0.0:8080
