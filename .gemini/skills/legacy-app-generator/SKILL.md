---
name: legacy-app-generator
description: Generates a legacy web application by combining a business specification from the `specs/` folder with a legacy technology stack from `specs/tech-stacks.md`. Use this skill when the user asks to build, generate, or create a legacy application.
---

# Legacy App Generator

This skill guides the agent to generate a legacy application based on pre-defined specifications and technology stacks in the repository.

## 1. Information Gathering
Check if the user provided a specific spec (from the `specs/` folder) and a tech stack (from `specs/tech-stacks.md`).
- If either is missing, use the `ask_user` tool. Provide a choice among the directories in `specs/` (e.g., `bakery-site`, `legacy-bank`) and the stacks documented in `specs/tech-stacks.md`.

## 2. Context Loading
Load the required context to understand the app to be built:
- Read the selected spec's `spec.md` and any supporting files in its directory (e.g., `ddl.md`).
- Read the requirements for the selected stack in `specs/tech-stacks.md`.
- Review `specs/forbidden-tech.md` to ensure no disallowed modern features are used.

## 3. Application Generation
Proceed to build the application:
- Create a unique 8-character tag derived from the tech stack (e.g., `javstrut` for Java/Struts, `pyzope1` for Python/Zope).
- Establish the target directory: `generated_apps/{spec_name}_{tag}/`.
- Write the complete application code inside this target directory to fulfill the spec using the exact tech stack rules. Use appropriate tools like `write_file` and `run_shell_command` as needed.
- **Important Constraint:** Do NOT write test files. The agent should exclusively use the pre-existing tests in the `specs/{spec_name}/test/` directory.
- **DO NOT** create or modify any files outside of the target directory. All application code, temp folders, working directories, etc. should be contained within the target directory.

## 4. Managing dependencies without affecting the local system
Use any available techniques to run the application without installing any software to the underlying system. Examples:
- When running Python code, create and use a **Virtual Environment**
- When running Java code, use `mvnw` (Maven Wrapper) so that `mvn` (Maven) does not need to be installed
- If required tools/packages can't be run without being installed, consider running a (docker) container to isolate installed packages

## 5. Testing and Validation
ALWAYS verify the generated application against the spec's tests:
- Activate the `test-runner` skill to execute the validation tests associated with the chosen spec.
- Iteratively fix any test failures until the application fully passes.
- If you are unable to get the application to fully pass after 3 turns, revert any changes you've made and tell the user your best explanation for what went wrong.
- NEVER modify the tests

## 6. Documentation
Create a file named `README.md` in the target directory for developer documentation: briefly describes the application, how it's implemented, and how to run it.