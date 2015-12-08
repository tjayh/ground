# Viiworks CMS

- Production Configuration below Please Read


## Usage Note
### Production / Project
* Download [Viiworks CMS v1.0.1](https://github.com/viiworks/Viiworks-CMS/archive/v1.0.1.zip) stable version or clone is to your machine
* Do this when you clone the repository
 * then run the `git checkout tags/v1.0.1`
 * DO NOT PUSH TO THIS REPOSITORY IF FOR DIFFERENT PRODUCTION / PROJECT so please follow the instructions
 * remove .git folder and .gitignore
* run the command `git init` using your git bash inside the production folder
* Every success edit please run `git add --all` then `git commit -m "Edits Description for your Work to the Repo"`
* to be continue: ask [@jestherthejoker](https://github.com/jestherthejoker) for more

### Development / Improvement
* Install the framework
* run the command `git reset --hard HEAD` to restore the deleted files like `installation` and `index.html`
* after editing the skin for development
  * transfer the `(/skin/vii_ChangeThisToProjectName)` files to `(/themes/vii_ChangeThisToProjectName)`
* Updates
  * `git pull` to get all the updates from the repository
  * `git add --all` to add all the untracked files to be able to commit
  * `git commit -m "Edits Description"` once you're really really really sure to your edits
  * `git push` to push all your committed edits to the repository so everyone is happy

#### For New Feature But don't want to be in master branch
* Create New branch for your new feature to prevent destruction to master :))
* To create and checkout to the new branch for development: `git checkout -b imyournewbranch` then `git push origin imyournewbranch` "It's us to you what kind of branch would like to name it :)"
* Before commiting, pulling and pushing make sure you're on the right branch to commit/push/pull to avoid merging to master of an incomplete development
* adding and commiting same way to master
* to push updates `git push origin imyournewbranch`
* to pull updates `git pull origin imyournewbranch`


`Note: Only @kirbylagunda, @viiworks and @jestherthejoker is the only authorized to create release versions`
