import { useContext, createContext } from "react";
import { useState } from "react";
import { Navigate } from "react-router-dom";
import SignIn from "../services/SignIn";

const AuthContext = createContext();

const AuthProvider = ({ children }) => {
    const [user, setUser] = useState(localStorage.getItem("user") ? JSON.parse(localStorage.getItem("user")) : null);
    const [token, setToken] = useState(localStorage.getItem("token") || "");

    const loginAction = async (email, password) => {
        const response = await SignIn(email, password)
            .then((data) => {
                setUser(data.user);
                setToken(data.token);
                localStorage.setItem("token", data.token);
                localStorage.setItem("user", JSON.stringify(data.user));
                return data;
            })
            .catch((error) => {
                throw new Error(error.message);
            });
    }

    const logout = () => {
        setUser(null);
        setToken("");
        localStorage.removeItem("token");
        localStorage.removeItem("user");
        return <Navigate to="/login" />;
    };

    return <AuthContext.Provider value={{ token, user, loginAction, logout }}>
        {children}
    </AuthContext.Provider>;
};

export default AuthProvider;

export const useAuth = () => {
    return useContext(AuthContext);
};