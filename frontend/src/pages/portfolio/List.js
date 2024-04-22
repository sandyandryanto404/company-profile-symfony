import { Component } from "react"
import { ShimmerThumbnail, ShimmerText    } from "react-shimmer-effects"

class List extends Component{

    constructor() {
        super();
        this.state = { 
            loading: true
        }
    }

    componentDidMount(){
        document.title = 'Portfolio | ' + process.env.REACT_APP_TITLE
        setTimeout(() => {
            this.setState({ loading: false })
        }, 3000)
    }

    render(){
        return (
            <>
                <section className="py-5">
                    <div className="container px-5 my-5">
                        <div className="text-center mb-5">
                            <h1 className="fw-bolder">Our Work</h1>
                            <p className="lead fw-normal text-muted mb-0">Company portfolio</p>
                        </div>
                        <div className="row gx-5">
                            { this.state.loading ? <>

                                 <div className="col-lg-6">
                                    <div className="position-relative mb-5">
                                        <ShimmerThumbnail height={400} className="py-5 px-4 px-md-5 mb-5" rounded />
                                        <ShimmerText line={5} gap={10} />
                                    </div>
                                </div>
                                <div className="col-lg-6">
                                    <div className="position-relative mb-5">
                                        <ShimmerThumbnail height={400} className="py-5 px-4 px-md-5 mb-5" rounded />
                                        <ShimmerText line={5} gap={10} />
                                    </div>
                                </div>
                                <div className="col-lg-6">
                                    <div className="position-relative mb-5 mb-lg-0">
                                        <ShimmerThumbnail height={400} className="py-5 px-4 px-md-5 mb-5" rounded />
                                        <ShimmerText line={5} gap={10} />
                                    </div>
                                </div>
                                <div className="col-lg-6">
                                    <div className="position-relative">
                                        <ShimmerThumbnail height={400} className="py-5 px-4 px-md-5 mb-5" rounded />
                                        <ShimmerText line={5} gap={10} />
                                    </div>
                                </div>

                            
                            </> : <>
                                
                                <div className="col-lg-6">
                                    <div className="position-relative mb-5">
                                        <img className="img-fluid rounded-3 mb-3" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." />
                                        <a className="h3 fw-bolder text-decoration-none link-dark stretched-link" href="#!">Project name</a>
                                    </div>
                                </div>
                                <div className="col-lg-6">
                                    <div className="position-relative mb-5">
                                        <img className="img-fluid rounded-3 mb-3" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." />
                                        <a className="h3 fw-bolder text-decoration-none link-dark stretched-link" href="#!">Project name</a>
                                    </div>
                                </div>
                                <div className="col-lg-6">
                                    <div className="position-relative mb-5 mb-lg-0">
                                        <img className="img-fluid rounded-3 mb-3" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." />
                                        <a className="h3 fw-bolder text-decoration-none link-dark stretched-link" href="#!">Project name</a>
                                    </div>
                                </div>
                                <div className="col-lg-6">
                                    <div className="position-relative">
                                        <img className="img-fluid rounded-3 mb-3" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." />
                                        <a className="h3 fw-bolder text-decoration-none link-dark stretched-link" href="#!">Project name</a>
                                    </div>
                                </div>

                            </> }
                        </div>
                    </div>
                </section>
                <section className="py-5 bg-light">
                    <div className="container px-5 my-5">
                        <h2 className="display-4 fw-bolder mb-4">Let's build something together</h2>
                        <a className="btn btn-lg btn-primary" href="#!">Contact us</a>
                    </div>
                </section>
            </>
        )
    }

}

export default List