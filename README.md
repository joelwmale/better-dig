# Better Dig

## Setup

1. Download the repo anywhere.
2. Add the following to your `~/.bash_profile`

```bash
dns() {
    php ~/Code/dig-cli/artisan dig-dns $1 $2
}
```
3. `source ~/.bash_profile`
