import { Component } from "react"
import {
  Route,
  HashRouter,
  Routes
} from "react-router-dom";
import Navigation from "./components/Navigation"
import Footer from "./components/Footer"
import Home from "./pages/Home"
import About from "./pages/About"
import Contact from "./pages/Contact"
import Faq from "./pages/Faq"
import Service from "./pages/Service"
import ArticleList from "./pages/article/List"
import ArticleDetail from "./pages/article/Detail"
import PortfolioList from "./pages/portfolio/List"
import PortfolioDetail from "./pages/portfolio/Detail"
import Login from "./pages/auth/Login"
import Register from "./pages/auth/Register"
import ForgotPassword from "./pages/auth/ForgotPassword"
import ResetPassword from "./pages/auth/ResetPassword"

class App extends Component {
  render(){
      return (
        <>
            <main className="flex-shrink-0">
                <HashRouter>
                    <Navigation />
                    <Routes>
                        <Route path="/" element={<Home />} />
                        <Route path="/about" element={<About />} />
                        <Route path="/contact" element={<Contact />}/>
                        <Route path="/faq" element={<Faq />}/>
                        <Route path="/service" element={<Service />}/>
                        <Route path="/article" element={<ArticleList />}/>
                        <Route path="/article/:slug" element={<ArticleDetail />}/>
                        <Route path="/portfolio" element={<PortfolioList />}/>
                        <Route path="/portfolio/:id" element={<PortfolioDetail />}/>
                        <Route path="/auth/login" element={<Login />}/>
                        <Route path="/auth/register" element={<Register />}/>
                        <Route path="/auth/email/forgot" element={<ForgotPassword />}/>
                        <Route path="/auth/email/reset" element={<ResetPassword />}/>
                    </Routes>
                </HashRouter>
            </main>
            <Footer />
        </>
      )
  } 
}

export default App