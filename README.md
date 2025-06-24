# 8mEM

This repository contains a simple Shopware plugin example named **TeamPlugin**. It provides a skeleton to manage employees in the Shopware administration and exposes a CMS block/element for the storefront. The plugin includes a basic employee list module and a CMS element that lets you select multiple employees for a page.

## Usage

1. Start the development environment using [dockware](https://dockware.io/):

   ```bash
   docker-compose up -d
   ```

   The compose file mounts persistent volumes so your data will survive container restarts.

2. Connect via SSH to the container for development:

   ```bash
   ssh root@localhost -p 22
   ```

   The default password is `dockware`.

   You can also work on the container straight from
   Visual Studio Code using the **Remote - SSH** extension.
   Add an entry to your local `~/.ssh/config` like:

   ```
   Host dockware
       HostName localhost
       User root
       Port 22
   ```

   Then choose "Remote-SSH: Connect to Host..." and pick `dockware`
   from the command palette. This opens the Shopware files inside
   the container so you can edit the plugin sources directly.

3. Place the `TeamPlugin` folder inside the `custom/plugins/` directory of the Shopware installation and install it via the administration or CLI.

4. Compile the administration assets:

   ```bash
   bin/console plugin:refresh
   bin/console plugin:install --activate TeamPlugin
   bin/console theme:compile
   ```

This will register a new menu entry under **Content** -> **Team** where employees can be managed.
