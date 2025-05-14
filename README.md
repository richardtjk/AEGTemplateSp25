# INIT SETUP
#### Run Setup Instructions for your staging branch and Auto-Deploy (INIT) below

# How to set up new branch for server
### Create new branch
- Click and create a new branch, name the branch according to your use case or with your name
- Once your branch is created save the name of your branch for later user
  
### Configure an SFTP Server in Visual Studio Code
- Open Visual Studio Code
- Clone the AEG repository
- Switch to your branch
- If the SFTP extension is not already installed:
  - Install Extensions
  - Search for SFTP
  - Install the SFTP from Natizyskunk
  - Open command pallet and type in SFTP:Config
  - Edit the sftp.json file to activate the extension
    -  update 90 on the username to your team number
    -  update 90 on the remote path to your team number
    -  update jocelyn on the remote path to your branch name
    -  DON'T CHECK THESE CHANGES into Main - keep them only in your branch
- Click on the newly added SFTP icon
  - Select the Agile Experience Server
  - Type in you adminXX password
 
  - DO NOT ADD YOUR PASSWORD HERE FOR CONVENIENCE.  It is NOT secure.

### Configure Server
- Log into server as admin using the following command in your command prompt/terminal

          ssh adminXX@104.131.178.112
- If you get a pop up on your first connection saying that it can not verify host, you can click yes. This should only pop up when you connect for the first time.
- Use given linux password, when entering your password in a linux system it will not show your typed charaters
- Create folder new folder for your branch

          mkdir /var/www/html/groupXX/stage/YOURBRANCHNAME
- Test your that the folder is created

          ls /var/www/html/groupXX/stage
- Your folder should show up along with all the other branch names

### Push Changes to your staging server
- Navigate to your branch in VS Code
- Edit website/index.html
- Right click on the website folder and choose upload
  - This will move your code to your own branch directory for testing your branch.
  - You can also upload individual files by choosing upload.
  
- After testing on the server, commit your changes to your branch.
  
### THE SYNC happen very quickly
- http://104.131.178.112:XX88/website/index.html so see the example change on index.html
- http://104.131.178.112:XX88/YOURBRANCHNAME/ to see the directory of files you put on your webserver

# How to access SQL database

- Edit all of highlighted inputs with your valid information. All of the information can be found in canvas.
  
<img width="509" alt="image" src="https://github.com/user-attachments/assets/60179b28-f7ff-49b0-944f-bf9a6b168a7b" />

- Then click "test connection"


# How to run php/website locally (OPTIONAL)
- Php projects can be run locally using XAMPP (https://www.apachefriends.org/)
- Install XAMPP with the PHP package
- Open the xampp control panel and turn on apatch
- Clone your repository to "xampp/htdocs" where xampp is the root of your XAMPP Installation
- navigate to "http://localhost/YOUR_REPO_NAME" and you should see the index page, "YOUR_REPO_NAME" will be whatever the folder is called
- (make sure apache is started)

# Developer Instructions
#### Staging server - http://104.131.178.112:XX88
#### Production Server - http://104.131.178.112:XX80
- You can only access the database though code from the server itself.
- Clone the repository onto your local machine
- Work in your branch
- Test the staging of your branch - http://104.131.178.112:XX88/ + your branch name
- When you are confident it works - Merge main into your Branch
- Test the staging of your branch again to make sure conflicts are properly resolved - http://104.131.178.112:XX88/ + your branch name
- When you are confident it works - Merge your branch into main - if conflicts, need to merge main to your branch again
- Test the production server - http://104.131.178.112:XX80
- Revert your changes if you broke production and try again

# Setup Instructions for Auto-deploy (INIT) - only one person needs to complete these instructions

Step 1. Create ssh keys for login to the server to be used by GitHub

- ssh as your adminXX user to the digital ocean server:
  
      ssh adminXX@104.131.178.112
    
- use your given linux password
- and do the following: To create the key (although I don't think the comment matters)
  
      ssh-keygen -C"adminXX@104.131.178.112"

- Use the defaults and no password.
- To confirm the key
  
       ssh-keygen -l
 
- To authorize the key
  
       ssh-copy-id adminXX@104.131.178.112

- Then, make note of where the rsa key was created.
- To test the key
  
       ssh adminXX@104.131.178.112
 
### Step 2. Create a GitHub secret in your repository with the private SSH key
- Download the private key using WinSCP with the default encoding.
- Go to your repository
- Select Settings
- Select Secret and Variables
- Select Actions
- Click on New repository secret
- Name is SSH_KEY
- Copy/paste into your GitHub Secret
 
### Step 3. Update your a GitHub actions to change 90 to your group number
- in file  .github/workflows/pushToServer.yml in main branch
- "USER" to your adminXX
- "GROUP" to groupXX/production

### Now, when you commit & push changes to main, it will deploy those changes on the production server.

### Test Changes on Production
 
 - After you make your commit to main under the website directory and push the change navigate to GitHub.com main branch.
 - There should be a dot (or something similar) by the latest commit
 ![image](https://github.com/user-attachments/assets/e82bebfc-f064-4e09-9b2f-2820514912fa)
 - This will show the status of the syncing
 - If no status is found you can go to the actions tab on top and look for your commit in "All Workflows"
   
 ### THE SYNC WILL TAKE A COUPLE MINUTES
 - Click on more details and assuming there are no error you should be good to go
 - see your changes at http://104.131.178.112:XX88/
