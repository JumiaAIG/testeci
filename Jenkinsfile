def set_jobs_retention_policy_by_branch(branch) {
    def result
    try {
      def tmp_branch_name = branch =~ "(^.*)-.*"
          switch (tmp_branch_name[0][1]) {
            case ["master", "development"]:
                result = properties([[$class: 'BuildDiscarderProperty', strategy: [$class: 'LogRotator', numToKeepStr: '10']]])
                break
            default:
                break
          }
    } catch (err) {
      //do nothing
    }

    result
  }

node {
  
  print set_jobs_retention_policy_by_branch("${env.BRANCH_NAME}")

  stage('stage 1') {
    echo 'stage 1'
  }

  stage('stage 2') {
    echo 'stage 2'
  }

  stage('stage 3') {
    echo 'stage 3'
  }
}
