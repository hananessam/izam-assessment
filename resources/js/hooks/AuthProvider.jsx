import { useContext, createContext } from "react";
import { useState } from "react";
import { Navigate } from "react-router-dom";
import SignIn from "../services/SignIn";
import RefreshToken from "../services/RefreshToken";

const AuthContext = createContext();

const AuthProvider = ({ children }) => {
    // check if user is sting in local storage
    const localStorageUser = localStorage.getItem("user");
    const [user, setUser] = useState(localStorageUser && typeof localStorageUser === "object" ? JSON.parse(localStorageUser) : null);
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

    // refresh token
    const refreshToken = async () => {
        const response = await RefreshToken(token)
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

    return <AuthContext.Provider value={{ token, user, loginAction, logout, refreshToken }}>
        {children}
    </AuthContext.Provider>;
};

export default AuthProvider;

export const useAuth = () => {
    return useContext(AuthContext);
};