# Viiworks CMS

- Production Configuration below Please Read


## Usage Note
### Production / Project
* Download [Viiworks CMS v1.0.1](https://github.com/viiworks/Viiworks-CMS/archive/v1.0.1.zip) stable version or clone is to your machine
* then run the `git checkout tags/v1.0.1`
* DO NOT PUSH TO THIS REPOSITORY IF FOR DIFFERENT PRODUCTION / PROJECT so please follow the instructions
* remove .git folder and .gitignore
* run on your git-bash the command `git init` inside the production folder
* Every success edit please run `git add --all`
* then `git commit -m "Edits Description"`
* to be continue: ask [@jestherthejoker](https://github.com/jestherthejoker) for more

### Development / Improvement
* Duplicate `installation` folder and `index.html`
* Install then rename the duplicated `installation` folder and `index.html` to its original name
* skin edits
  * after editing the editing the skin files `(/skin/vii_ChangeThisToProjectName)` transfer the files to `(/themes/vii_ChangeThisToProjectName)`
* Updates
  * `git pull` to get all the updates from the repository
  * `git add --all` to add all the untracked files to be able to commit
  * `git commit -m "Edits Description"` once you're really really really sure to your edits
  * `git push` to push all your committed edits to the repository so everyone is happy

#### For New Feature But don't want to be in master branch
* Create New branch for your new feature to prevent destruction to master :))


`Note: Only @kirbylagunda, @viiworks and @jestherthejoker is the only authorized to create release versions`
