# sangeki
#### これは惨劇RoopeR脚本公開のための個人サイトです
以下のコマンドでドキュメントルートへシンボリックリンクを張る事で、惨劇RoopeRの脚本リストをWebで公開できます。.gitディレクトリを公開しないよう注意。
```
cd ${YOUR_GIT_WORK_DIRECTORY}
git clone https://github.com/gittib/sangeki.git
cp .env.example .env.prod
#cp .env.example .env.dev
ln -s ${YOUR_GIT_WORK_DIRECTORY}/sangeki/ ${YOUR_DOCUMENT_ROOT}/sangeki
```
開発環境、本番環境のデプロイはbatch/配下のシェルで行う
環境に応じた.envファイルにSSH_KEY_PATHを定義する
