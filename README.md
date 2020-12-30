# sangeki
#### これは惨劇RoopeR脚本公開のための個人サイトです
以下のコマンドでドキュメントルートへシンボリックリンクを張る事で、惨劇RoopeRの脚本リストをWebで公開できます。.gitディレクトリを公開しないよう注意。
```
cd ${YOUR_GIT_WORK_DIRECTORY}
git clone https://github.com/gittib/sangeki.git
touch .env.prod
ln -s ${YOUR_GIT_WORK_DIRECTORY}/sangeki/ ${YOUR_DOCUMENT_ROOT}/sangeki
```

開発環境デプロイ
```
#!/bin/bash

GIT_ROOT_DIR=/hoeghoge/fugafuga/
SSH_KEY_PATH=piyopiyo.pem

cd ${GIT_ROOT_DIR}

eval $(ssh-agent)
ssh-add ${SSH_KEY_PATH}

git pull

ssh-agent -k

git log -n 1 --pretty=%H > secret/cache/latest_git_hash
```

本番環境デプロイ
```
#!/bin/bash

GIT_ROOT_DIR=/hoeghoge/fugafuga/
SSH_KEY_PATH=piyopiyo.pem

read -p "update PROD env. ok? (y/N): " yn
case "$yn" in [yY]*) ;; *) echo "abort." ; exit ;; esac

cd ${GIT_ROOT_DIR}

eval $(ssh-agent)
ssh-add ${SSH_KEY_PATH}

git checkout --force master
git pull

ssh-agent -k

git log -n 1 --pretty=%H > secret/cache/latest_git_hash
```
