def set_jobs_retention_policy_by_branch(branch) {
    try {
        branches_str = "${env.retention_branches}" != "null" ? "${env.retention_branches}" : "[]"
        branches = branches_str
		.trim()
		.replace(" ", "")
		.replace("'", "")
		.replace("\"", "")
		.tokenize(',[]')
	    	//java.lang.UnsupportedOperationException: Calling public static java.util.List org.codehaus.groovy.runtime.DefaultGroovyMethods.collect(java.util.Collection,groovy.lang.Closure) on a CPS-transformed closure is not yet supported (JENKINS-26481); encapsulate in a @NonCPS method, or use Java-style loops
		//.collect { it as String }

      def tmp_branch_name = branch =~ "(^.*).*"
          switch (tmp_branch_name[0][1]) {
            case branches:
                def maxBuilds = "${env.retention_maxBuilds}" != "null" ? "${env.retention_maxBuilds}" : "100"
                println "Retention policy: Only the last " + maxBuilds + " jobs are kept."
                properties([[$class: 'BuildDiscarderProperty', strategy: [$class: 'LogRotator', numToKeepStr: maxBuilds]]])
                break
            default:
                println "Retention policy: Not applied for this branch"
                break
          }
    } catch (err) {
      //do nothing
        println "Retention policy: Not applied for this branch"
        println err
    }
  }

node {
  
  set_jobs_retention_policy_by_branch("${env.BRANCH_NAME}")

  stage('stage 1') {
    echo 'stage 1'
  }

  stage('stage 2') {
    echo 'stage 2'
  }

  stage('stage 3') {
    echo 'stage 3'
  }
    
    stage('WS cleanup'){
        step([$class: 'WsCleanup'])
    }
}
