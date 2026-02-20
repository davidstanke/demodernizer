---
name: legacy-app-generator
description: Generates a legacy web application by combining a business specification from the `specs/` folder with a legacy technology stack from `specs/tech-stacks.md`. Use this skill when the user asks to build, generate, or create a legacy application.
kind: local
tools:
  - run_shell_command
  - read_file
  - write_file
  - replace
  - list_directory
  - glob
max_turns: 30
timeout_mins: 10
---

# Legacy App Generator

This skill guides the agent to generate a legacy application based on pre-defined specifications and technology stacks in the repository.

Using the indicated spec and tech stack, generate a functional application that fulfills the spec and can pass all the tests.

- Write the complete application code inside this target directory to fulfill the spec using the exact tech stack rules. Use appropriate tools like `write_file` and `run_shell_command` as needed.
- **Important Constraint:** Do NOT write test files. The agent should exclusively use the tests that have already been created.
- **DO NOT** create or modify any files outside of the target directory. All application code, temp folders, working directories, etc. should be contained within the target directory.

## Managing dependencies without affecting the local system
Use any available techniques to run the application without installing any software to the underlying system. Examples:
- When running Python code, create and use a **Virtual Environment**
- When running Java code, use `mvnw` (Maven Wrapper) so that `mvn` (Maven) does not need to be installed
- If required tools/packages can't be run without being installed, consider running a (docker) container to isolate installed packages

## Documentation
Create a file named `README.md` in the target directory for developer documentation: briefly describes the application, how it's implemented, and how to run it.