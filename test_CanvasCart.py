from playwright.sync_api import sync_playwright
import time

def test_canvascart():
    print("🚀 CanvasCart Validation Test")
    print("=" * 35)

    with sync_playwright() as p:
        browser = p.chromium.launch(headless=False)
        page = browser.new_page()

        try:
            # ---------------- TEST 1: LOAD WEBSITE ----------------
            print("📍 Loading website...")
            page.goto("http://localhost/CanvasCart/index.php")
            time.sleep(2)

            title = page.title()
            if "CanvasCart" in title or title != "":
                print("✅ Website loaded")

            # ---------------- TEST 2: NAVBAR ----------------
            print("🧭 Navbar check...")
            if page.locator(".navbar").is_visible():
                print("✅ Navbar visible")

            # ---------------- TEST 3: LOGIN PAGE ----------------
            print("🔑 Opening login...")
            page.goto("http://localhost/CanvasCart/login.php")
            time.sleep(2)

            if "login" in page.url:
                print("✅ Login page opened")

            # ---------------- TEST 4: LOGIN FUNCTION ----------------
            print("🔐 Performing login...")
            page.fill('input[name="email"]', "admin@gmail.com")
            page.fill('input[name="password"]', "1234")
            page.click('button')

            time.sleep(3)

            if "index" in page.url:
                print("✅ Login successful")

            # ---------------- TEST 5: PRODUCTS ----------------
            print("📦 Checking products...")
            products = page.locator(".product-card")
            count = products.count()
            print(f"✅ Products found: {count}")

            # ---------------- TEST 6: CART ----------------
            print("🛒 Checking cart...")
            page.goto("http://localhost/CanvasCart/cart.php")
            time.sleep(2)

            if "cart" in page.url:
                print("✅ Cart page opened")

            # ---------------- TEST 7: LOGOUT ----------------
            print("🚪 Logging out...")
            page.goto("http://localhost/CanvasCart/logout.php")
            time.sleep(2)

            if "login" in page.url or page.locator("text=Login").count() > 0:
                print("✅ Logout successful")

            print("\n🎉 All tests executed!")

        except Exception as e:
            print(f"❌ Error: {e}")

        finally:
            browser.close()


# RUN
if __name__ == "__main__":
    test_canvascart()