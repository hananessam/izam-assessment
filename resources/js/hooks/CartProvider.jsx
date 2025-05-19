import { createContext, useContext, useState } from "react";
import { useEffect } from "react";
import GetCart from "../services/GetCart";

const CartContext = createContext();

export const CartProvider = ({ children }) => {
    const [cart, setCart] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);
    const [cartCount, setCartCount] = useState(0);
    const [cartTotal, setCartTotal] = useState(0);
  
    useEffect(() => {
        const fetchCart = async () => {
            const response = await GetCart();
            setCart(response.cart.cart);
            setCartCount(response.count.count);
            setCartTotal(response.total.total);
        };

        fetchCart();
    }, []);

  return (
    <CartContext.Provider value={{ cart, setCart, cartCount, cartTotal, loading, error, setLoading, setError, setCartCount, setCartTotal }}>
      {children}
    </CartContext.Provider>
  );
};

export const useCart = () => useContext(CartContext);
