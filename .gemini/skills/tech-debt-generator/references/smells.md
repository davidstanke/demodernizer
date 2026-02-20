# Tech Debt Smells & Strategies

To effectively simulate years of human-driven legacy development and high staff turnover, apply the following strategies. These must *never* break the existing functionality or the tests, but they should make the code significantly harder to read, maintain, and extend.

## 1. Naming & Obfuscation
* **Generic Naming:** Rename clearly named variables to generic or context-less names (e.g., `data`, `item`, `temp`, `manager`, `processor`, `val1`, `obj`).
* **Inconsistent Casing:** Mix camelCase, snake_case, and PascalCase if the language allows it without breaking tests.
* **Hungarian Notation (Done Poorly):** Prefix variables with their type (e.g., `strName`, `iCount`, `bIsReady`) but occasionally leave them wrong if a type changed.
* **Overly Verbose Names:** `processTheDataFromDatabaseAndReturnResultAsArray` instead of `fetchData`.

## 2. Unnecessary Indirection & Complexity
* **Spaghettification:** Break a simple function into multiple smaller, tightly-coupled functions that only get called once and are scattered across the file.
* **Useless Abstractions:** Introduce a `Manager`, `Factory`, or `Service` class/object that merely wraps a single native method.
* **Deep Nesting:** Wrap code blocks in unnecessary `if (true)` or `try { ... } catch (e) { throw e; }` statements.
* **Global/Shared State:** If feasible, move local variables to module-level or class-level scope so they act as shared state (while ensuring tests don't fail due to concurrency/state leakage).

## 3. Comments & Documentation
* **Obvious Comments:** `// increment i by 1` above `i++`.
* **Outdated/Misleading Comments:** Comment code that no longer reflects reality, or add "T-O-D-O: Fix this hack" next to working code.
* **Commented-Out Code:** Leave large blocks of commented-out, slightly modified code right next to the active code (simulating a developer trying something out and abandoning it).
* **Passive-Aggressive Comments:** `// Bob added this, I don't know why but it breaks if you remove it.`

## 4. Control Flow and Magic
* **Magic Numbers/Strings:** Hardcode values directly into logic instead of using constants. Conversely, extract arbitrary values into constants like `const TWO = 2;`.
* **Dead Code:** Add variables that are assigned but never used, or `if` conditions that are always `false` (e.g., `if (false && debugMode)` where `debugMode` is never true).
* **Double Negatives:** `if (!isNotReady)` instead of `if (isReady)`.

## 5. Artifacts of "Many Hands"
* **Inconsistent Formatting:** Mix tabs and spaces, or leave weird blank lines.
* **Varying Paradigms:** Use an old idiom in one place (like a `for` loop with index) and a modern one right next to it (like `.map()`), showing different developers touched it over time.