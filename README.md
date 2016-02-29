# Seedstars challenge 1

**Console Script**

Jenkins (http://jenkins-ci.org/) is a open source continuous integration server.

Create a script, in PHP, that uses Jenkins' API to get a list of jobs and their status from a given jenkins instance. The status for each job should be stored in an sqlite database along with the time for when it was checked.

**Assumptions**

I used the Apache Jenkins public instance available at: https://builds.apache.org.

**Instructions**

```
# clone repository
$ git clone https://github.com/soniacurcialeiro/seedstars-challenge-1.git

# change directory
$ cd seedstars-challenge-1

# execute script
$ php list-jobs
or
$ chmod +x list-jobs
$ ./list-jobs

```
