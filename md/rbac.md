Запрещено все что не разрешено (чего касаются роли), и это правильно, иначе если добавили что-то, тогда нужно всем запретить это (нелогично).

Роли - Roles,
Разрешения - Permissions,
Правила (дополнительные РАЗРЕШЕНИЯ) - Rules

Роли:

| Администратор                 | admin  |  
| Модератор                     | moder  |  
| Пользователь                  | user   |  
| Неподтвержденный пользователь | unconf |  
| Гость                         | guest  |  

Назначение разрешений и правил:

| Роли   | Разрешения                                  | Наименования             |  
| guest  | Регистрироваться                            | signup                   |  
|        | Логиниться                                  | signin                   |  
|        | Отправлять ссылку для восстановления пароля | requestPasswordRecovery  |  
| unconf | Отправлять ссылку на подтверждение email    | requestEmailConfirmation |  
| user   | Разлогиниться                               | signout                  |  
|        | Изменить пароль                             | changePassword           |  
|        | Добавлять свои комментарии                  | createOwnComment         |  
|        | Редактировать свои комментарии              | updateOwnComment         |  
|        | Удалять свои комментарии                    | deleteOwnComment         |  
| moder  | Доступ к административной панели            | haveAccessAP             |  
|        | Создать свою публикацию                     | createOwnPublication     |  
|        | Редактировать свою публикацию               | updateOwnPublication     |  
|        | Удалить свою публикацию                     | deleteOwnPublication     |  
|        | Создать своё портфолио                      | createOwnPortfolio       |  
|        | Редактировать своё портфолио                | updateOwnPortfolio       |  
|        | Удалить своё портфолио                      | deleteOwnPortfolio       |  
|        | Добавить свой файл                          | createOwnFile            |  
|        | Удалить свой файл                           | deleteOwnFile            |  
| admin  | Создать публикацию                          | createPublication        |  
|        | Редактировать публикацию                    | updatePublication        |  
|        | Удалить публикацию                          | deletePublication        |  
|        | Создать портфолио                           | createPortfolio          |  
|        | Редактировать портфолио                     | updatePortfolio          |  
|        | Удалить портфолио                           | deletePortfolio          |  
|        | Добавить файл                               | createFile               |  
|        | Удалить файл                                | deleteFile               |  
|        | Добавить комментарий                        | createComment            |  
|        | Удалить комментарий                         | updateComment            |  
|        | Редактировать комментарий                   | deleteComment            |  

Связи ролей (родитель наследует права детей, что не логично в корне):

| Родитель | Ребенок |  
| admin    | moder   |  
| moder    | user    |  
| unconf   | user    |  

Связи разрешений:

| Родитель             | Ребенок           |  
| createOwnComment     | createComment     |  
| updateOwnComment     | updateComment     |  
| deleteOwnComment     | deleteComment     |  
| createOwnPublication | createPublication |  
| updateOwnPublication | updatePublication |  
| deleteOwnPublication | deletePublication |  
| createOwnPortfolio   | createPortfolio   |  
| updateOwnPortfolio   | updatePortfolio   |  
| deleteOwnPortfolio   | deletePortfolio   |  
| createOwnFile        | createFile        |  
| deleteOwnFile        | deleteFile        |  
