#!/bin/zsh

# Directory containing migration files
MIGRATIONS_DIR="database/migrations"

# Loop through each file in the migrations directory
for FILE in $MIGRATIONS_DIR/*; do
  # Check if it's a file
  if [[ -f $FILE ]]; then
    # Run the artisan migrate command with the file path
    php artisan migrate --path="$FILE"
  fi
done
