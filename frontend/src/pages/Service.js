import { Component } from "react"

class Service extends Component{

    componentDidMount(){
        document.title = 'Service | ' + process.env.REACT_APP_TITLE
    }

    render(){
        return (<></>)
    }

}

export default Service