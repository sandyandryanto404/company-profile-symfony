import { Component } from "react"

class Faq extends Component{

    componentDidMount(){
        document.title = 'Faq | ' + process.env.REACT_APP_TITLE
    }

    render(){
        return (<></>)
    }

}

export default Faq