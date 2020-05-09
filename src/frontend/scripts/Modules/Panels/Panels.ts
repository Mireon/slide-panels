import Selector from '@tools/Selector';
import Panel from '@modules/Panels/Panel';
import Target from '@entities/Target';

/**
 * ...
 */
class Panels {
    /**
     * ...
     *
     * @type Array<Panel>
     */
    private panels = Array<Panel>();

    /**
     * The constructor.
     */
    public constructor() {
        Selector.element('panel').each((element: Element) => this.panels.push(new Panel(element)));
    }

    /**
     * ...
     *
     * @param id { string }
     *   ...
     *
     * @return Panel
     */
    public getPanelById(id: string): Panel {
        for (const panel of this.panels) {
            if (panel.equalId(id)) {
                return panel;
            }
        }

        return null;
    }

    /**
     * ...
     *
     * @return Panel
     */
    public getCurrentPanel(): Panel {
        for (const panel of this.panels) {
            if (panel.getState().isVisible()) {
                return panel;
            }
        }

        return null;
    }

    /**
     * ...
     *
     * @param target { Target }
     *   ...
     *
     * @return void
     */
    public show(target: Target): void {
        const current = this.getCurrentPanel();
        const selected = this.getPanelById(target.getPanelId());

        // There isn't one visible panel here.
        // The stage, the backstage and a side with the selected panel are opening.
        // The selected panel with layers is showing without animation.
        if (!current) {
            selected.show(target);
            return;
        }

        // The selected panel is the current panel.
        // Layers in the selected panel are showing with animation,
        // because the selected panel is already showed.
        if (selected === current) {
            current.show(target);
            return;
        }

        // The selected panel is on the same side as the current panel.
        // The selected panel isn't the current panel. The case has already been processed.
        // The current panel is hiding.
        // The selected panel is showing.
        // Layouts from the selected panel are showing without animation.
        if (target.getSide() === current.getSide()) {
            current.outside();
            selected.inside(target);
            return;
        }

        // The selected panel is on the other side relativity the current panel.
        // A side of the current panel is hiding.
        // The current panel will be hidden after the timeout, because the side is hiding gradually.
        // The selected panel is showing with layers without animation.
        if (target.getSide() !== current.getSide()) {
            current.hide();
            selected.show(target);
            return;
        }
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        for (const panel of this.panels) {
            panel.hide();
        }
    }
}

export default Panels;
