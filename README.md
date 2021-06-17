# Dousic Development Laravel App

Welcome to the official Dousic Media Laravel Web App repo for on-going development of the core user application!

---

## Getting Started with Local Development

Use the following steps to get started with local development for this repository:

### Step 1

Clone the repository to your local machine via the [command line](https://www.google.com/search?client=firefox-b-1-d&q=clone+repo+to+machine+via+command+line+github) or [GitHub Desktop](https://desktop.github.com/).

Additionally, if you want sweet PHP development benchmarking and excellent query monitoring, go ahead and install the [Clockwork Firefox Extension](https://addons.mozilla.org/en-US/firefox/addon/clockwork-dev-tools/) or [Clockwork Chrome Extension](https://chrome.google.com/webstore/detail/clockwork/dmggabnehkmmfmdffgajcflpdjlnoemp) which will give you real-time access to the deep insights available from our [Clockwork](https://underground.works/clockwork/) PHP browser dev tools functionality!

### Step 2

In Bash/Terminal/etc., navigate to your newly installed repo clone's root directory.

```bash
cd path/to/your/repo/directory/
```

### Step 3

Create a new environment file in your IDE or from the command line called `.env`, and fill it out with the details needed for your development instance.

```bash
touch .env
```

To open the file in VS Code from the command line (assuming you have command line functionality enabled in VS Code) to add local environment settings, use:

```bash
code .env
```

> You can feel free to use the `.env.example` file in this repo to copy and paste in the settings from the example file into your new `.env` file if you're not sure what you're doing!

```bash
code .env.example
```

### Step 4

Next from your root directory in a command line, install all the project PHP dependencies with the command:

```bash
composer update
```

### Step 5

Next install all of the project Node/NPM dependencies with the command: 

```bash
npm install
```

### Step 6

Next you'll need to spin up a new project databse and seed it with our default data sets by running the command:

```bash
sail artisan migrate:fresh --seed
```

### Step 7

Next up, it's often a good idea to go ahead and run one of the two front-end centric processes to view the app - with either the development design system CSS file (which is BIG and will slow down intense in-browser debugging/inspecting) or the production version of the CSS file (which is much, much faster per page load and when using browser dev tools - but does NOT have all of the tasty Tailwind CSS classes as the production version only has Tailwind CSS classes that are found in app view files!)


To work with the app with a more performant app experience using the app's Production CSS file , run:

```bash
npm run prod
```

To work with the app with a more utility-focused app experience using the app's Development CSS file , run:

```bash
npm run dev
```

## Step 8

Finally, to spin up a Docker container with Laravel Sail, and run your application from `localhost`, run the command:

```bash
sail up
```

> Running the `sail up` command will launch a local server connected to the database the migration command built based off of our project's factory models, seeding data, and table structure migrations, allowing you to now view the application through a browser and using the `localhost/` url (unless your enviroment differs... which is totally fine and cool!)

> If you are looking to debug and/or optimize your server-side code, you can use our project's [Clockwork](https://underground.works/clockwork/) PHP browser dev tools functionality in real-time via the Clockwork [Firefox Extension](https://addons.mozilla.org/en-US/firefox/addon/clockwork-dev-tools/) or [Chrome Extension](https://chrome.google.com/webstore/detail/clockwork/dmggabnehkmmfmdffgajcflpdjlnoemp)! To access the Clockwork information (which is stored in your local project `./storage/clockwork/` directory), simply inspect the page and look for the `Clockwork` tab in-line with the usuals like Console, Inspector, Debugger, etc.
