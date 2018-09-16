# Lorem Yii

## Install

1. `mkdir -p ~/projects/my/lorem_yii && cd ~/projects/my/lorem_yii && git clone git@github.com:Zlatov/lorem_yii.git ./`
2. `composer install`
3. `./init`
4. `./yii migrate`
5. `./yii user/register {admin} {email}`
6. `./yii migrate --migrationPath=@yii/rbac/migrations`
7. `./yii crud/init`
8. `./yii crud/set_admin {admin}`
