import { Component } from "react"

class Contact extends Component{

    componentDidMount(){
        document.title = 'Contact | ' + process.env.REACT_APP_TITLE
    }

    render(){
        return (<></>)
    }

}

export default Contact