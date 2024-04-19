import { Component } from "react"

class Login extends Component{

    componentDidMount(){
        document.title = 'Sign In | ' + process.env.REACT_APP_TITLE
    }

    render(){
        return (<></>)
    }

}

export default Login