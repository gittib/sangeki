# sangeki
#### これは惨劇RoopeR脚本公開のための個人サイトです
以下のコマンドでドキュメントルートへシンボリックリンクを張る事で、惨劇RoopeRの脚本リストをWebで公開できます。.gitディレクトリを公開しないよう注意。
```
cd ${YOUR_GIT_WORK_DIRECTORY}
git clone https://github.com/gittib/sangeki.git
touch .env.prod
ln -s ${YOUR_GIT_WORK_DIRECTORY}/sangeki/ ${YOUR_DOCUMENT_ROOT}/sangeki
```
