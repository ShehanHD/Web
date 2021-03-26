import React, { useState } from "react";
import weCode from "../../Media/weCode.png";

function NavBar() {
    const [menuState, setMenuState] = useState("close");

    const handleMenu = (e) => {
        e.preventDefault();

        setMenuState((menuState === "close") ? "open" : "close");
    }

    return (
        <>
            <header className="header">
                <nav className="flex flex-jc-sb flex-ai-c">
                    <a href="/" className="header-logo flex flex-ai-c">
                        <img src={weCode} alt="weCode-logo" />
                        <h3 className="header-logo-title">weCode</h3>
                    </a>

                    <a href="#" className={"header-menu hide-for-pc " + menuState} id="menuBtn" onClick={handleMenu}>
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>

                    <div className="header-links hide-for-mobile">
                        <a href="#">Home</a>
                        <a href="#">About</a>
                        <a href="#">Contact</a>
                        <a href="#">Blog</a>
                    </div>
                </nav>
            </header>

            <div className={"flex flex-jc-se mobile-menu hide-for-pc " + menuState}>
                <div className={"flex flex-jc-se flex-ai-c flex-fd-col mobile-menu-links"}>
                    <a href="#">Home</a>
                    <a href="#">About</a>
                    <a href="#">Contact</a>
                    <a href="#">Blog</a>
                </div>
            </div>
        </>
    );
}

export default NavBar;
