---
name: tech-debt-generator
description: Adds bad code smells, increases complexity, and simulates years of chaotic human development on a legacy codebase, without breaking tests or functionality. Use when asked to make code worse, add tech debt, or simulate legacy coding styles.
---

# Tech Debt Generator

This skill introduces "bad code smells" and increases technical debt in an existing codebase, simulating years of uncoordinated maintenance, employee turnover, and rushed deadlines.

## Core Rules

1. **NEVER Break Functionality**: The application must continue to work exactly as it did before.
2. **NEVER Break Tests**: All existing automated tests must continue to pass. Do not modify the test assertions themselves unless absolutely necessary to match variable renames, and even then, avoid changing test files if possible.
3. **Keep the Tech Stack Intact**: Do not add new dependencies, frameworks, or libraries. Work only with the existing stack.

## Workflow

1. **Understand the Target**: Identify the file(s) or module(s) the user wants to add tech debt to.
2. **Review Existing Code & Tests**: Read the code to understand its structure and ensure you know what tests cover it.
3. **Select Smells**: Refer to [references/smells.md](references/smells.md) for a catalog of tech debt strategies. Pick a few that fit the current code structure naturally.
4. **Apply Changes Incrementally**:
   - Use the `replace` or `write_file` tools to apply the changes.
   - Refactor clean code into messy, human-like legacy code.
   - Add misleading comments, redundant logic, and generic naming.
5. **Validate**: Run tests and type-checkers (if applicable) to ensure you haven't broken the functionality. If a test fails, revert the change and try a less destructive obfuscation.

## Reference Material

* **[references/smells.md](references/smells.md)**: A catalog of specific code smells, obfuscation techniques, and "legacy coding" strategies to apply.