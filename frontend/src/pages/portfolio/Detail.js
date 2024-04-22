import { Component } from "react"
import { ShimmerThumbnail, ShimmerText    } from "react-shimmer-effects"

class Detail extends Component{

    constructor() {
        super();
        this.state = { 
            loading: true
        }
    }

    componentDidMount(){
        document.title = 'Portfolio Details | ' + process.env.REACT_APP_TITLE
        setTimeout(() => {
            this.setState({ loading: false })
        }, 3000)
    }

    render(){
        return (
            <>
                <section className="py-5">
                    <div className="container px-5 my-5">
                        <div className="row gx-5 justify-content-center">
                            <div className="col-lg-6">
                                <div className="text-center mb-5">
                                    <h1 className="fw-bolder">Project Title</h1>
                                   { this.state.loading ? <>
                                        <ShimmerText line={5} gap={10} />
                                   </> : <>
                                        <p className="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab similique, ducimus ut alias sit accusamus illum, asperiores deserunt dolorum quaerat qui! Ab, quisquam explicabo magni dolores unde beatae quam a.</p>
                                   </> }
                                </div>
                            </div>
                        </div>
                        <div className="row gx-5">
                            { this.state.loading ? <>
                                <div className="col-12">
                                     <ShimmerThumbnail height={700} className="py-5 px-4 px-md-5 mb-5" rounded />
                                </div>
                                <div className="col-lg-6">
                                     <ShimmerThumbnail height={400} className="py-5 px-4 px-md-5 mb-5" rounded />
                                </div>
                                <div className="col-lg-6">
                                     <ShimmerThumbnail height={400} className="py-5 px-4 px-md-5 mb-5" rounded />
                                </div>
                            </> : <>
                                <div className="col-12">
                                    <img className="img-fluid rounded-3 mb-5" src="https://dummyimage.com/1300x700/343a40/6c757d" alt="..." />
                                </div>
                                <div className="col-lg-6">
                                    <img className="img-fluid rounded-3 mb-5" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." />
                                </div>
                                <div className="col-lg-6">
                                    <img className="img-fluid rounded-3 mb-5" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." />
                                </div>
                            </> }
                        </div>
                        <div className="row gx-5 justify-content-center">
                            <div className="col-lg-6">
                                <div className="text-center mb-5">
                                   { this.state.loading ? <>
                                        <ShimmerText line={10} gap={10} />
                                   </> : <>
                                        <p className="lead fw-normal text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam deserunt architecto enim eos accusantium fugit recusandae illo iste dignissimos possimus facere ducimus odit voluptatibus exercitationem, ex laudantium illum voluptatum corporis.</p>
                                        <a className="text-decoration-none" href="#!">
                                            View project
                                            <i className="bi-arrow-right"></i>
                                        </a>
                                   </> }
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </>
        )
    }

}

export default Detail