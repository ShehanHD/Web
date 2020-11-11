import { createMuiTheme, makeStyles, MuiThemeProvider, Paper } from '@material-ui/core';
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import NavBar from './components/layout/NavBar';
import Slide from '@material-ui/core/Slide';
import './App.scss';
import { Slideshow } from '@material-ui/icons';
import Gallery from './components/gallery/Gallery';
import AboutUs from './components/about-us/AboutUs';
import ContactUs from './components/contact-us/ContactUs';


function App() {

  const theme = createMuiTheme({
    palette: {
      type: "dark",
      primary: { main: '#000000' },
      secondary: { main: '#db0000' },
      background: {
        default: "#e6e6e6",
        paper: "#000000",
      },
    },
  });

  return (
    <div className={'app'}>
      <BrowserRouter>
        <MuiThemeProvider theme={theme}>
          <div className={'menu'}>
            <NavBar />
          </div>
          <div className={'content'}>
            <Switch>
              <Route exact path={'/gallery'} component={Gallery} />
              <Route exact path={'/about'} component={AboutUs} />
              <Route exact path={'/contact'} component={ContactUs} />
            </Switch>
          </div>
        </MuiThemeProvider>
      </BrowserRouter>
    </div>
  );
}

export default App;
