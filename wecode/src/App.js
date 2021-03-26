import Card from './Components/Cards/Card';
import Main from './Components/Main/Main';
import NavBar from './Components/NavBar/NavBar'
import './Styles/App.scss';

function App() {
  return (
    <div className="App">
      <NavBar />
      <Main />
      <Card />
    </div>
  );
}

export default App;
