import { Component } from "react"

class About extends Component{

    componentDidMount(){
        document.title = 'About | ' + process.env.REACT_APP_TITLE
    }

    render(){
        return (<></>)
    }

}

export default About