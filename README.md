# Barokah Admin

The admin dashboard of barokah-shop. Demo: https://barokah.bayudc.fun/admin

### 🧢 Roles & abilities

- Admin: managing product, category, and employee
- Worker: managing transaction, and product stocks

### 👤 Sample Users

| Email              | Password | Role   |
| ------------------ | -------- | ------ |
| admin@barokah.shop | password | Admin  |
| alvin@barokah.shop | password | Worker |
| rijal@barokah.shop | password | Worker |
| dafa@barokah.shop  | password | Worker |

### ✨ Features?

Try it yourself [here](https://barokah.bayudc.fun/admin), i am too dumb to explain it

## 🎨 Tech Stacks

- Laravel 10
- Livewire 3
- Tailwind
- NotusJS
- MariaDB

## 🖼 Screenshots

![Home](https://media.discordapp.net/attachments/946013429200723989/1205312868908793907/Screenshot_from_2024-02-09_07-40-24.png?ex=65d7ea15&is=65c57515&hm=d5bb095ba632d90d89ec6ef79928922601debbdc008f07016358b34eb8a467ec&=&format=webp&quality=lossless&width=960&height=540)
![Transaction](https://media.discordapp.net/attachments/946013429200723989/1205312868334182420/Screenshot_from_2024-02-09_07-39-33.png?ex=65d7ea15&is=65c57515&hm=1d91bd1c96d02634a50a3a79c02b220a222fb7448f0d27626f92f27a83b0107d&=&format=webp&quality=lossless&width=960&height=540)
![Stock](https://media.discordapp.net/attachments/946013429200723989/1205312868627648523/Screenshot_from_2024-02-09_07-39-44.png?ex=65d7ea15&is=65c57515&hm=3b668b7d02028b7d945bedd030ca079fe97f134924de53d53377122af8a5064d&=&format=webp&quality=lossless&width=960&height=540)
![Product](https://media.discordapp.net/attachments/946013429200723989/1205312869231493160/Screenshot_from_2024-02-09_07-41-46.png?ex=65d7ea15&is=65c57515&hm=fb10ee6da05c10046c4a791f13ae9b5a9bf35df59a746727e1128eda36550e67&=&format=webp&quality=lossless&width=960&height=540)
![Employee](https://media.discordapp.net/attachments/946013429200723989/1205312869537943602/Screenshot_from_2024-02-09_07-41-55.png?ex=65d7ea15&is=65c57515&hm=be9b9669f6c8af3d0e430ceaeee902dbcf511a1f846709b32810034348be8e6d&=&format=webp&quality=lossless&width=960&height=540)

and more...

## 🔥 Dev Setup

> Requirements: php(8.2), composer, and bun

```
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve

bun install
bun run dev
```
