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

Para ativar a autenticação no `src/Controller/AppController.php` basta adicionar o componente `Auth` e configurar conforme abaixo:
```
$this->loadComponent('Authenticator.Locales');
        $this->loadComponent('Cookie');

        $this->loadComponent('Auth', [
            'authorize' => 'Controller',
            'loginAction' => [
                'plugin' => 'Authenticator',
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Authenticator.Users'
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        $this->Auth->allow(['display', 'login', 'logout']);
        $this->set('user', $this->Auth->user());
```

Ainda no `src/Controller/AppController.php` deve-se negar o acesso a todas as páginas, para isso, basta adicionar a seguinte função:
```
//Nega o acesso a todos os controllers
public function isAuthorized($user)
{
   // By default deny access.
   return false;
}
```
Em todos os controllers que deseja fazer o controle de acesso, basta adicionar a seguinte função:
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
Caso queira adicionar uma rota de acesso, basta adicionar em ``config/routes.php`` antes do fallback a seguinte linha:
```
$routes->connect('/login', ['plugin' => 'authenticator','controller' => 'users', 'action' => 'login']);
```
Ai só acessar site:port/login ou localhost:8765/login 
Qualquer dúvida pode ser enviado na aba de contato no site acima.