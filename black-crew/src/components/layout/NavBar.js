import React from 'react'
import { AppBar, Button, IconButton, makeStyles, Toolbar, Typography, Link as L } from '@material-ui/core';
import MenuIcon from '@material-ui/icons/Menu';
import { Link } from 'react-router-dom';

const useStyles = makeStyles((theme) => ({
    root: {
        flexGrow: 1,
    },
    menuButton: {
        marginRight: theme.spacing(1),
    },
    title: {
        flexGrow: 1,
    },
}));

function NavBar() {
    const classes = useStyles();

    return (
        <div className={classes.root}>
            <AppBar position="fixed" color="primary">
                <Toolbar>
                    <IconButton className={classes.menuButton} edge="start" color="inherit" aria-label="menu">
                        <MenuIcon />
                    </IconButton>
                    <L component={Link} to={'/'} underline="none" className={classes.title}>
                        <Typography variant="h5" >
                            BLACK CREW
                    </Typography>
                    </L>

                    <L component={Link} to={'contact'} underline="none">
                        <Button className={classes.menuButton} variant="outlined" color="secondary">Contact Us</Button>
                    </L>
                    <L component={Link} to={'about'} underline="none">
                        <Button className={classes.menuButton} variant="outlined" color="secondary">About Us</Button>
                    </L>

                    <Button className={classes.menuButton} variant="outlined" color="secondary">Logout</Button>
                    <Button className={classes.menuButton} variant="outlined" color="secondary">Bookings</Button>

                    <Button className={classes.menuButton} variant="outlined" color="secondary">Login</Button>
                    <Button className={classes.menuButton} variant="outlined" color="secondary">Register</Button>

                </Toolbar>
            </AppBar>
        </div>
    )
}

export default NavBar
