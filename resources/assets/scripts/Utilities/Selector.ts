/**
 * ...
 */
export enum Locations {
    INTERNAL,
    EXTERNAL,
    UBIQUITOUS,
}

/**
 * ...
 */
class Selector {
    /**
     * ...
     *
     * @type Locations
     */
    private location = Locations.INTERNAL;

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
    public static element(element: string, location: Locations = Locations.INTERNAL): Selector {
        return Selector.instance().add(`[data-element="${element}"]`).local(location);
    }

    /**
     * ...
     *
     * @type Selector
     */
    private local(location: Locations): Selector {
        this.location = location;
        return this;
    }

    /**
     * ...
     *
     * @type Selector
     */
    private add(selector: string): Selector {
        this.selectors.push(selector);
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
            case Locations.INTERNAL:
                selectors = `#slide-panels ${selectors}`;
                break;
            case Locations.EXTERNAL:
                selectors = `[data-plugin="slide-panels"]${selectors}`;
                break;
            case Locations.UBIQUITOUS:
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
