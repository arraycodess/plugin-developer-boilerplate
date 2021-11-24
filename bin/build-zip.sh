#!/bin/sh

PLUGIN_SLUG="plugin-developer-boilerplate"
PROJECT_PATH=$(pwd)
BUILD_PATH="${PROJECT_PATH}/dist"
DEST_PATH="$BUILD_PATH/$PLUGIN_SLUG"

echo "Create folders"
rm -rf "$BUILD_PATH"
mkdir -p "$DEST_PATH"

echo "Build JS"
npm install
npm run production
echo "Build Composer"
composer install --no-dev || exit "$?"

echo "Syncing files"
rsync -rc "$PROJECT_PATH/" "$DEST_PATH/" --exclude-from="$PROJECT_PATH/.distignore" --delete --delete-excluded

echo "Build Zip"
cd "$BUILD_PATH" || exit
zip -q -r "${PLUGIN_SLUG}.zip" "$PLUGIN_SLUG/"
rm -rf "$PLUGIN_SLUG"

echo "Build Success !!!"
