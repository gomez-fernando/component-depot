CREATE DATABASE IF NOT EXISTS component_depot  CHARACTER SET utf8 COLLATE utf8_general_ci;
USE component_depot;

CREATE TABLE IF NOT EXISTS users(
id              smallint auto_increment not null,
role            ENUM('user', 'admin') not null,
name            varchar(100) not null,
surname         varchar(200) not null,
nick            varchar(200) not null,
level           enum('novato', 'avanzado', 'experto') null,
email           varchar(255) not null,
password        varchar(255) not null,
image_path      varchar(255) null,
created_at      datetime null,
updated_at      datetime null,
remember_token  varchar(255) null,
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS categories(
id              smallint auto_increment not null,
user_id         smallint not null,
name            varchar(255) not null,
description     text not null,
created_at      datetime null,
updated_at      datetime null,
CONSTRAINT pk_categories PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS components(
id              smallint auto_increment not null,
category_id     smallint not null,
user_id         smallint not null,
name            varchar(255) not null,
image_path      varchar(255) not null,
description     text not null,
created_at      datetime null,
updated_at      datetime null,
CONSTRAINT pk_components PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS comments(
id              smallint auto_increment not null,
component_id    smallint not null,
user_id         smallint not null,
content         text not null,
created_at      datetime null,
updated_at      datetime null,
CONSTRAINT pk_comments PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS likes(
id              smallint auto_increment not null,
user_id         smallint not null,
component_id    smallint not null,
created_at      datetime null,
updated_at      datetime null,
CONSTRAINT pk_likes PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS ratings(
id              smallint auto_increment not null,
user_id         smallint not null,
component_id    smallint not null,
value           int(2) not null,
created_at      datetime null,
updated_at      datetime null,
CONSTRAINT pk_ratings PRIMARY KEY(id)
)ENGINE=InnoDb;

-- ALTER TABLES----------------------------

ALTER TABLE `users`

    ADD CONSTRAINT uk_users_email_nick UNIQUE(email, nick);

ALTER TABLE `components`

    ADD CONSTRAINT uk_components_name UNIQUE(name),
    ADD CONSTRAINT fk_components_categories FOREIGN KEY(category_id) REFERENCES categories(id) ON DELETE restrict ON UPDATE restrict,
    ADD CONSTRAINT fk_components_users FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE restrict ON UPDATE restrict;

ALTER TABLE `categories`

    ADD CONSTRAINT uk_categories_name UNIQUE(name),
    ADD CONSTRAINT fk_categories_users FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE restrict ON UPDATE restrict;

ALTER TABLE `comments`

    ADD CONSTRAINT fk_comments_users FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE restrict ON UPDATE restrict,
    ADD CONSTRAINT fk_comments_components FOREIGN KEY(component_id) REFERENCES components(id) ON DELETE restrict ON UPDATE restrict;


ALTER TABLE `likes`

    ADD CONSTRAINT fk_likes_users FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE restrict ON UPDATE restrict,
    ADD CONSTRAINT fk_likes_components FOREIGN KEY(component_id) REFERENCES components(id) ON DELETE restrict ON UPDATE restrict;

ALTER TABLE `ratings`

    ADD CONSTRAINT fk_ratings_users FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE restrict ON UPDATE restrict,
    ADD CONSTRAINT fk_ratings_components FOREIGN KEY(component_id) REFERENCES components(id) ON DELETE restrict ON UPDATE restrict;
