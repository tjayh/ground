# Viiworks CMS

- Production Configuration below Please Read


## Usage Note
### Production / Project
* Download [Viiworks CMS v1.1.0](https://github.com/viiworks/Viiworks-CMS/archive/v1.1.0.zip) stable version or clone in to your machine
* Do this when you clone the repository
 * then run the `git checkout tags/v1.1.0`
 * DO NOT PUSH TO THIS REPOSITORY IF FOR DIFFERENT PRODUCTION / PROJECT so please follow the instructions
 * change origin of the repository (if you don't have one, please ask [@jestherthejoker](https://github.com/jestherthejoker)) `git remote set-url origin https://github.com/USERNAME/OTHERREPOSITORY.git`
* Do this when you just download the framework
 * run the command `git init` using your git bash inside the production folder
* Every success edit please run `git add --all` then `git commit -m "Edits Description for your Work to the Repo"`
* to be continue: ask [@jestherthejoker](https://github.com/jestherthejoker) for more

### Development / Improvement
* Install the framework
* run the command `git reset --hard HEAD` to restore the deleted files like `installation` and `index.html`
* after editing the skin for development
  * transfer the `(/skin/vii_ChangeThisToProjectName)` files to `(/themes/vii_ChangeThisToProjectName)`
* Pull everything using: `git pull`
* Updates to the development whomever your branch is:
  * Create your own branch for development see instruction below
  * `git pull origin imyournewbranch` to get all the updates from this branch imyournewbranch is just a sample
  * `git add --all` to add all the untracked files to be able to commit
  * Note: Before commiting, make sure you're on the right branch `imyournewbranch`
  * `git commit -m "Edits Description"` once you're really really really sure to your edits
  * `git push origin imyournewbranch` to push all your committed edits to the repository so everyone is happy

#### Creating Branch for your new enhancement
* master branch is for releasing purpose only
* Create New branch for your feature
* To create and checkout to the new branch for development: `git checkout -b imyournewbranch` then `git push origin imyournewbranch` "It's up to you for what kind of branch name would like :)"
* Before commiting, pulling and pushing make sure you're on the right branch to commit/push/pull to avoid merging to master of an incomplete development
* adding and commiting same way to master
* to push updates `git push origin imyournewbranch`
* to pull updates `git pull origin imyournewbranch`


### Releasing
* Check first the imyournewbranch branch, do some testing. If success, to the following:
* `git checkout master`
* `git pull origin imyournewbranch` to merge the changes from this branch name
* `git push` to community repository and make a release on Release Tab :)


`Note: Only @kirbylagunda, @viiworks and @jestherthejoker is the only authorized to create release versions`

Happy Git! :D :D :D Gotta Git Git
