# CryptoPlanet Bots

Free AutoClaim Diamonds on CryptoPlanets Faucets.

List of Bots :

  - BCH Diamonds
  - Will be updated soon..
  
### Installation

Requires [PHP](https://php.net/) v7 to run.

Install Command

```sh
$ git clone https://github.com/meetdani/cryptoplanets-bot.git
$ cd cryptoplanets-bot
```
### Configuration

Download Packet Capture From Playstore
if you are using Nox or other Emulator Use Fiddler and setup the proxy

Open your BCH Diamonds APP.

Close all ads and Press Play On Packet Capture APP:



Click Claim:

![Claim](/src/Screenshot_2.png?raw=true)

Search the url request that contains ajax.php :

![Capturing Packets](/src/Screenshot_1.png?raw=true)

Copy the Urls and Cookie Headers and paste to config.php file:

![Claim](/src/Screenshot_3.png?raw=true)

### Docs/Manual

$config variable on the script.

| Variable | Description | Example
| ------ | ------ | ------ |
| urls | Url From Packet Capture or Fiddler | hUDJSNChdiej73xxxxxxcrypto2
| sessid | PHPSESSID cookie header from Packet Capture or Fiddler | vcvbuo9sv137rg4l8gasxxxx
| worker | Numbers of Worker/claim, be careful | 20 or 50 (free)

### How To Run

```sh
$ php cryptoplanets-bch.php
```

## Contributors

Thanks goes to these wonderful dev ❤️ :

<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore -->
| [<img src="https://avatars3.githubusercontent.com/u/5636480?s=460&v=4" width="100px;"/><br /><sub><b>Eka Syahwan</b></sub>](https://github.com/radenvodka)<br /> sdata author (PHP cURL multi-threading)
<!-- ALL-CONTRIBUTORS-LIST:END -->

### Issues 
> Please report this problem through the issue page [Create New Issue] (https://github.com/meetdani/cryptoplanets-bot/issues)
