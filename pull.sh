#!/bin/bash
cd "$(dirname "$0")"
git stash
git pull
chmod -R 777 /storage/wordpress/wp-content

