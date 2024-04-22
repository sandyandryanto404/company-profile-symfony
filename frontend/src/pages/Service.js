import { Component } from "react"
import { ShimmerTitle, ShimmerPostItem, ShimmerCircularImage, ShimmerSectionHeader   } from "react-shimmer-effects"

class Service extends Component{

    constructor() {
        super();
        this.state = { 
            loading: true
        }
    }

    componentDidMount(){
        document.title = 'Service | ' + process.env.REACT_APP_TITLE
        setTimeout(() => {
            this.setState({ loading: false })
        }, 3000)
    }

    render(){
        return (
            <>
                <header className="py-5">
                    <div className="container px-5">
                         <div className="row justify-content-center">
                            { this.state.loading ? <>
                                <div className="col-lg-8 col-xxl-6">
                                    <ShimmerTitle line={5} gap={15} variant="primary" />    
                                </div>
                            </> : <>
                                <div className="col-lg-8 col-xxl-6">
                                    <div className="text-center my-5">
                                        <h1 className="fw-bolder mb-3">Our mission is to make building websites easier for everyone.</h1>
                                        <p className="lead fw-normal text-muted mb-4">Start Bootstrap was built on the idea that quality,
                                            functional website templates and themes should be available to everyone. Use our open
                                            source, free products, or support us by purchasing one of our premium products or services.
                                        </p>
                                        <a className="btn btn-primary btn-lg" href="#scroll-target">Read our story</a>
                                    </div>
                                </div>
                            </> }
                         </div>
                    </div>
                </header>
                <section className="py-5 bg-light" id="features">
                    <div className="container px-5 my-5">
                         <div className="row gx-5">
                            <div className="col-lg-4 mb-5 mb-lg-0">
                                <h2 className="fw-bolder mb-0">A better way to start building.</h2>
                            </div>
                            <div className="col-lg-8">
                                { this.state.loading ? <>
                                    <div className="row gx-5 row-cols-1 row-cols-md-2">
                                        <div className="col mb-5 h-100">
                                            <ShimmerTitle line={5} gap={10} variant="primary" />
                                        </div>
                                        <div className="col mb-5 h-100">
                                            <ShimmerTitle line={5} gap={10} variant="primary" />
                                        </div>
                                        <div className="col mb-5 mb-md-0 h-100">
                                            <ShimmerTitle line={5} gap={10} variant="primary" />
                                        </div>
                                        <div className="col h-100">
                                            <ShimmerTitle line={5} gap={10} variant="primary" />
                                        </div>
                                    </div>
                                </> : <>
                                    <div className="row gx-5 row-cols-1 row-cols-md-2">
                                        <div className="col mb-5 h-100">
                                            <div className="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                                    className="bi bi-collection"></i></div>
                                            <h2 className="h5">Featured title</h2>
                                            <p className="mb-0">Paragraph of text beneath the heading to explain the heading. Here
                                                is just a bit more text.</p>
                                        </div>
                                        <div className="col mb-5 h-100">
                                            <div className="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                                    className="bi bi-building"></i></div>
                                            <h2 className="h5">Featured title</h2>
                                            <p className="mb-0">Paragraph of text beneath the heading to explain the heading. Here
                                                is just a bit more text.</p>
                                        </div>
                                        <div className="col mb-5 mb-md-0 h-100">
                                            <div className="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                                    className="bi bi-toggles2"></i></div>
                                            <h2 className="h5">Featured title</h2>
                                            <p className="mb-0">Paragraph of text beneath the heading to explain the heading. Here
                                                is just a bit more text.</p>
                                        </div>
                                        <div className="col h-100">
                                            <div className="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                                    className="bi bi-toggles2"></i></div>
                                            <h2 className="h5">Featured title</h2>
                                            <p className="mb-0">Paragraph of text beneath the heading to explain the heading. Here
                                                is just a bit more text.</p>
                                        </div>
                                    </div>
                                </> }
                            </div>
                         </div>
                    </div>
                </section>
                <section className="py-5">
                    <div className="container px-5 my-5">
                        <div className="text-center">
                            <h2 className="fw-bolder">Our Customer</h2>
                            <p className="lead fw-normal text-muted mb-5">Dedicated to quality and your success</p>
                        </div>
                        <div className="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                            { this.state.loading ? <>
                                <div className="col mb-5 mb-5 mb-xl-0">
                                    <div className="text-center">
                                        <ShimmerCircularImage size={150} />
                                        <ShimmerSectionHeader center />
                                    </div>
                                </div>
                                <div className="col mb-5 mb-5 mb-xl-0">
                                    <div className="text-center">
                                        <ShimmerCircularImage size={150} />
                                        <ShimmerSectionHeader center />
                                    </div>
                                </div>
                                <div className="col mb-5 mb-5 mb-sm-0">
                                    <div className="text-center">
                                        <ShimmerCircularImage size={150} />
                                        <ShimmerSectionHeader center />
                                    </div>
                                </div>
                                <div className="col mb-5">
                                    <div className="text-center">
                                        <ShimmerCircularImage size={150} />
                                        <ShimmerSectionHeader center />
                                    </div>
                                </div>
                            </> : <>
                                <div className="col mb-5 mb-5 mb-xl-0">
                                    <div className="text-center">
                                        <img className="img-fluid rounded-circle mb-4 px-4"
                                            src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                        <h5 className="fw-bolder">Ibbie Eckart</h5>
                                        <div className="fst-italic text-muted">Founder &amp; CEO</div>
                                    </div>
                                </div>
                                <div className="col mb-5 mb-5 mb-xl-0">
                                    <div className="text-center">
                                        <img className="img-fluid rounded-circle mb-4 px-4"
                                            src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                        <h5 className="fw-bolder">Arden Vasek</h5>
                                        <div className="fst-italic text-muted">CFO</div>
                                    </div>
                                </div>
                                <div className="col mb-5 mb-5 mb-sm-0">
                                    <div className="text-center">
                                        <img className="img-fluid rounded-circle mb-4 px-4"
                                            src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                        <h5 className="fw-bolder">Toribio Nerthus</h5>
                                        <div className="fst-italic text-muted">Operations Manager</div>
                                    </div>
                                </div>
                                <div className="col mb-5">
                                    <div className="text-center">
                                        <img className="img-fluid rounded-circle mb-4 px-4"
                                            src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                        <h5 className="fw-bolder">Malvina Cilla</h5>
                                        <div className="fst-italic text-muted">CTO</div>
                                    </div>
                                </div>
                            </> }        
                        </div>            
                    </div>               
                </section>
                <section className="bg-light py-5 py-xl-8">
                    <div className="container">
                        <div className="text-center">
                            <h2 className="fw-bolder">Testimonials</h2>
                            <p className="lead fw-normal text-muted mb-5">
                                We deliver what we promise. See what clients are expressing about us.
                            </p>
                        </div>
                    </div> 
                    <div className="container overflow-hidden">
                        <div className="row gy-4 gy-md-0 gx-xxl-5">
                            { this.state.loading ? <>

                                <div className="col-12 col-md-4">
                                    <ShimmerPostItem card title text cta />
                                </div>

                                <div className="col-12 col-md-4">
                                    <ShimmerPostItem card title text cta />
                                </div>

                                <div className="col-12 col-md-4">
                                    <ShimmerPostItem card title text cta />
                                </div>
                            
                            </> : <>
                                
                                <div className="col-12 col-md-4">
                                    <div className="card border-0 border-bottom border-primary shadow-sm">
                                        <div className="card-body p-4 p-xxl-5">
                                            <figure>
                                                <img className="img-fluid rounded rounded-circle mb-4 border border-5" loading="lazy" src="https://dummyimage.com/150x150/ced4da/6c757d" alt=""/>
                                                <figcaption>
                                                    <div className="mb-3 mt-2">
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                    </div>
                                                    <blockquote className="bsb-blockquote-icon mb-4">Nam ultricies, ex lacinia dapibus
                                                        faucibus, sapien ipsum euismod massa, at aliquet erat turpis quis diam. Class
                                                        aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                                        himenaeos.</blockquote>
                                                    <h4 className="mb-2">Luna John</h4>
                                                    <h5 className="fs-6 text-secondary mb-0">UX Designer</h5>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>

                                <div className="col-12 col-md-4">
                                    <div className="card border-0 border-bottom border-primary shadow-sm">
                                        <div className="card-body p-4 p-xxl-5">
                                            <figure>
                                                <img className="img-fluid rounded rounded-circle mb-4 border border-5" loading="lazy" src="https://dummyimage.com/150x150/ced4da/6c757d" alt=""/>
                                                <figcaption>
                                                    <div className="mb-3 mt-2">
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                    </div>
                                                    <blockquote className="bsb-blockquote-icon mb-4">Nam ultricies, ex lacinia dapibus
                                                        faucibus, sapien ipsum euismod massa, at aliquet erat turpis quis diam. Class
                                                        aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                                        himenaeos.</blockquote>
                                                    <h4 className="mb-2">Luna John</h4>
                                                    <h5 className="fs-6 text-secondary mb-0">UX Designer</h5>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>

                                <div className="col-12 col-md-4">
                                    <div className="card border-0 border-bottom border-primary shadow-sm">
                                        <div className="card-body p-4 p-xxl-5">
                                            <figure>
                                                <img className="img-fluid rounded rounded-circle mb-4 border border-5" loading="lazy" src="https://dummyimage.com/150x150/ced4da/6c757d" alt=""/>
                                                <figcaption>
                                                    <div className="mb-3 mt-2">
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                        <i className="bi bi-star text-warning me-2"></i>
                                                    </div>
                                                    <blockquote className="bsb-blockquote-icon mb-4">Nam ultricies, ex lacinia dapibus
                                                        faucibus, sapien ipsum euismod massa, at aliquet erat turpis quis diam. Class
                                                        aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                                        himenaeos.</blockquote>
                                                    <h4 className="mb-2">Luna John</h4>
                                                    <h5 className="fs-6 text-secondary mb-0">UX Designer</h5>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>

                            </> }
                        </div>
                    </div>         
                </section>
            </>
        )
    }

}

export default Service