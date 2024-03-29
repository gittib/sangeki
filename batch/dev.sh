#!/bin/bash

cd `dirname $0`
cd ..
. .env.dev

eval $(ssh-agent)
ssh-add ${SSH_KEY_PATH}

git pull

ssh-agent -k

chmod 777 secret/cache
git log -n 1 --pretty=%H > secret/cache/latest_git_hash

cat secret/assets/js/define.js > sangeki/all.js
find secret/assets/js/functions/ -type f | grep js | xargs cat >> sangeki/all.js
find secret/assets/js/individual/ -type f | grep js | xargs cat >> sangeki/all.js

