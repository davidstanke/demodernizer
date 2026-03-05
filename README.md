# DeModernizer
An agentic tool for creating "legacy" applications -- software using old technologies and full of tech debt.

> [!IMPORTANT]
> This repo includes a slightly-modified `.gemini/system.md` file. To activate it, use this command to run Gemini CLI: `GEMINI_SYSTEM_MD=1 gemini`

## Huh?
One use of agentic AI coding assistants is for modernizing legacy applications. To demonstrate this process, you might want to take a legacy application and show your audience how to modernize it. But where are you going to get that legacy application? You need something that's out of date, full of tech debt, and free to use in a demo context. **DeModernizer** is a tool for making applications that are new, and can be tailored to the needs of your audience, but are _like_ old applications, as if they were developed 15+ years ago.

## How it works
The root agent starts from one of the BDD-style specs in `specs`, then delegates to sub-agents to build an application, test it, style it, and iteratively add tech debt to it. Generated applications are written to `generated_apps`. See `GEMINI.md` and the skills in `.gemini/skills` for more details.

## About the applications
The generated applications are relatively small (demo sized). You could add to the specs or otherwise prompt the agents to make them bigger, but that's going to slow down demos. Also, for the sake of easy demos, the tech stacks specify local database options (e.g. SQLite or in-memory options).

## Setting up
- `npm install -g playwright`
- `npx playwright install`

### Image generation
It's likely that your application will benefit from having some images. It's recommended to install the [nano banana gemini extension](https://geminicli.com/extensions/?name=gemini-cli-extensionsnanobanana).