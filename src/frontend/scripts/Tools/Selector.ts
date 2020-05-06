import { C } from '@entities/C';

/**
 * ...
 */
class Selector {
    /**
     * ...
     *
     * @type C.location
     */
    private location = C.location.INSIDE;

    /**
     * ...
     *
     * @type Array<string>
     */
    private selectors = Array<string>();

    /**
     * ...
     *
     * @type Selector
     */
    public static instance(): Selector {
        return new Selector();
    }

    /**
     * ...
     *
     * @type Selector
     */
    public static root(): Selector {
        return Selector.instance();
    }

    /**
     * ...
     *
     * @type Selector
     */
    public static element(element: string): Selector {
        return Selector.instance().attribute('data-element', element);
    }

    /**
     * ...
     *
     * @type Selector
     */
    public local(location: C.location): Selector {
        this.location = location;
        return this;
    }

    /**
     * ...
     *
     * @type Selector
     */
    public attribute(attribute: string, value: string): Selector {
        this.selectors.push(`[${attribute}="${value}"]`);
        return this;
    }

    /**
     * ...
     *
     * @type Selector
     */
    private build(): string {
        let selectors = '';

        if (this.selectors.length > 0) {
            selectors = this.selectors.reduce((result: string, selector: string) => result + selector);
        }

        switch (this.location) {
            case C.location.INSIDE:
                selectors = `#slide-panels ${selectors}`;
                break;
            case C.location.OUTSIDE:
                selectors = `[data-plugin="slide-panels"]${selectors}`;
                break;
            case C.location.EVERYWHERE:
                selectors = `#slide-panels ${selectors}, [data-plugin="slide-panels"]${selectors}`;
                break;
        }

        return `${selectors}`;
    }

    /**
     * ...
     *
     * @type Element
     */
    public get(): Element {
        return document.querySelector(this.build());
    }

    /**
     * ...
     *
     * @type NodeListOf<Element>
     */
    public all(): NodeListOf<Element> {
        return document.querySelectorAll(this.build());
    }

    /**
     * ...
     *
     * @type NodeListOf<Element>
     */
    public each(handler: (element: Element) => void): void {
        this.all().forEach(handler);
    }
}

export default Selector;
