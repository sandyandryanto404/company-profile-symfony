import { Component } from "react"

class Register extends Component{

    componentDidMount(){
        document.title = 'Sign Up | ' + process.env.REACT_APP_TITLE
    }

    render(){
        return (<></>)
    }

}

export default Register