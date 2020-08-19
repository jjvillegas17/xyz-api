# XYZ API

XYZ api prints letters X,Y,Z patterns using 'o' in the console 

## Installation
1. Clone the repository.
2. Run composer install inside the project 
```bash
composer install
```
3. Run the local server 
```bash
php -S localhost:8000 -t public
```


## Usage

Sample endpoint:
```bash
http://localhost:8000/api/xyz?letters=XYZxXzzxy&size=9&direction=horizontal
```
Output will be printed in the console where you ran your local server.
![Sample Console Output](https://github.com/jjvillegas17/xyz-api/blob/master/sampleConsoleOutput.PNG?raw=true)