# Authenticator plugin for CakePHP 3 

## Instalação
#### Plugin desenvolvido por Felipe Panegalli
##### http://panegalli.esy.es/

Para instalar esse pacote, baixe o composer e execute o seguinte comando para instalação:

```
composer require felipepanegalli/authenticator-cakephp-3:dev-master
```

Após o download, deve-se ativar o plugin no final do arquivo bootstrap em `config/bootstrap.php`
```
Plugin::load('Authenticator', ['bootstrap' => false, 'routes' => true]);
```

Primeiramente deve-se gerar o banco com o comando: 
```
bin/cake migrations migrate --plugin=Authenticator
```

Logo após, gerar os Seeds com o comando
```
bin/cake migrations seed --plugin=Authenticator
```
Quando é gerado o Seed do plugins, são adicionados dois registros de usuário ao banco, o admin e user, para ambos, a senha é o mesmo que o username ou seja, o admin é admin e o user é user.

Após ativado o plugins, nenhum controller irá permitir o acesso, para isso basta adicionar a seguinte função nos controller que deseja controllar o acesso:
```
public function isAuthorized($user)
{
   //Verifica qual é a action
   $action = $this->request->getParam('action');
   //Carrega o Model de Regras
   $this->loadModel('Authenticator.Roles');
   //Carrega a ragra baseado na role_id do usuário
   $role = $this->Roles->find()->where(['id' => $this->Auth->user('role_id')])->first();

   //Verifica se o usuário é administrador e está nas actions do array, permite o acesso das actions inclusas
   if (strtolower($role['title']) == 'administrator' and in_array($action, ['index', 'view', 'add', 'edit', 'delete'])) {
       return true;

   //Verifica se o usuário é usuario e está nas actions do array, permite o acesso das actions inclusas
   } elseif (strtolower($role['title']) == 'user' and in_array($action, ['index', 'view'])) {
       return true;

   //Se nenhuma das condições foram True, nega o acesso
   } else {
       return false;
   }

   //Aqui vai alguma validação caso necessário...
}
```

Se for necessário fazer alguma alteração de model para acesso ao usuário, verifica a pasta raiz do plugin em `/vendor/felipepanegalli/authenticator-cakephp-3/src/Controller/AppController.php`

Caso queira adicionar uma rota de acesso, basta adicionar em ``config/routes.php`` antes do fallback a seguinte linha:
```
$routes->connect('/login', ['plugin' => 'authenticator','controller' => 'users', 'action' => 'login']);
```
Ai só acessar site:port/login ou localhost:8765/login 
Qualquer dúvida pode ser enviado na aba de contato no site acima.